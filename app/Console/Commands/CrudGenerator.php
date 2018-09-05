<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate
    {name : Class (singular) for example User} {--indo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD Operations';    

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    protected function getStub($type){
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function model($name,$indo){
        if($indo){            
            $columns = \DB::select('SHOW COLUMNS FROM '.strtolower($name));
            $tableName = 'protected $table= "'.$name.'";';
        }else{            
            $tableName = '';            
            $columns = \DB::select('SHOW COLUMNS FROM '.strtolower(str_plural($name)));
        }

        $fillableField = '';


        foreach($columns as $key => $column){
            if(!in_array($column->Field,['id','created_at','updated_at','deleted_at'])){
                $fillableField .= '"'.$column->Field.'",';
            }
        }

        $modelTemplate = str_replace(
            ['{{modelName}}','{{fillableField}}','{{tableName}}'],
            [$name,$fillableField,$tableName],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/{$name}.php"), $modelTemplate);
    }

    protected function controller($name,$indo){
        if($indo){
            $controllerTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{tableName}}'
                ],
                [
                    $name,
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst($name),
                    strtolower($name),
                ],
                $this->getStub('Controller')
            );            

        } else {
            $controllerTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{tableName}}'
                ],
                [
                    $name,
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst(str_plural($name)),
                    strtolower(str_plural($name))
                ],
                $this->getStub('Controller')
            );            
        }

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $controllerTemplate);
    }

    protected function views($name,$indo){
        if($indo){
            $columns = \DB::select('SHOW COLUMNS FROM '.strtolower($name));
            $foreach = '@foreach($'.$name.' as ${{modelNameSingularLowerCase}})';
        }else{
            $columns = \DB::select('SHOW COLUMNS FROM '.strtolower(str_plural($name)));
        }


        $tableHeadingHtml = '<th><input type="checkbox" id="checkAll"></th>';
        $tableBodyHtml = '';
        $formAddHtml = '';
        $formEditHtml = '';

        $tableShowDataHtml = '<table class="table table-striped">';
        foreach($columns as $key => $column){
            if(!in_array($column->Field,['updated_at','deleted_at'])){

                $tableHeadingHtml .= '<th>'.$column->Field.'</th>
                ';

                if($column->Field == 'created_at'){
                    $tableBodyHtml .= '<td>{{$'.strtolower($name).'->'.$column->Field.'->format("d M Y")}}</td>
                ';
                } else{
                    $tableShowDataHtml .= '
                    <tr>                        
                        <td>'.$column->Field.'</td>
                        <td>{{$'.strtolower($name).'->'.$column->Field.'}}</td>
                        </tr>
                    ';
                    $tableBodyHtml .= '<td>{{$'.strtolower($name).'->'.$column->Field.'}}</td>
                    ';
                }

                if(!in_array($column->Field,['id','created_at','updated_at','deleted_at'])){
                   $formAddHtml .= '<div class="form-group{{$errors->has("'.$column->Field.'") ? " has-error" : ""}}">
                      {!!Form::label("'.$column->Field.'","'.ucfirst($column->Field).'",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("'.$column->Field.'",old("'.$column->Field.'"),["class" => "form-control","placeholder" => "'.ucfirst($column->Field).'"])!!}
                        @if($errors->has("'.$column->Field.'"))
                          <span class="help-block">{{$errors->first("'.$column->Field.'")}}</span>
                        @endif
                      </div>
                    </div>
                    ';
                }

                if(!in_array($column->Field,['id','created_at','updated_at','deleted_at'])){
                   $formEditHtml .= '<div class="form-group{{$errors->has("'.$column->Field.'") ? " has-error" : ""}}">
                      {!!Form::label("'.$column->Field.'","'.ucfirst($column->Field).'",["class" => "col-sm-2 control-label"])!!}
                      <div class="col-sm-10">
                        {!!Form::text("'.$column->Field.'",$'.strtolower($name).'->'.$column->Field.',["class" => "form-control","placeholder" => "'.ucfirst($column->Field).'"])!!}
                        @if($errors->has("'.$column->Field.'"))
                          <span class="help-block">{{$errors->first("'.$column->Field.'")}}</span>
                        @endif
                      </div>
                    </div>
                    ';
                }
            }
        }
        $tableHeadingHtml .= '<th style="width:10%;">Actions</th>
        ';

        $tableBodyHtml .= '<td>
                
                <form action="{{route(\''.strtolower(str_plural($name)).'.destroy\',$'.strtolower($name).')}}" method="post">
                    <a class="btn btn-xs btn-white" href="{{route("'.strtolower(str_plural($name)).'.show",$'.strtolower($name).')}}" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i>
                </a>

                <a class="btn btn-xs btn-warning" href="{{route("'.strtolower(str_plural($name)).'.edit",$'.strtolower($name).')}}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i>
                </a>
                    {!! method_field(\'delete\') !!}                    
                    {!! csrf_field() !!}
                    <button type="submit" value="Delete" class="btn btn-xs btn-danger" id="'.strtolower($name).'Delete"><i class="fa fa-trash"></i></button>
                    
                </form>                
            </td>';

        $tableShowDataHtml .= '</table>';
        if($indo){
            $viewIndexTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNameSingularUpperCaseFirstLetter}}',
                    '{{tableHeadingHtml}}',
                    '{{tableBodyHtml}}',
                    '{{formAddHtml}}',                
                ],
                [
                    $name,
                    ucfirst($name),
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst($name),
                    $tableHeadingHtml,
                    $tableBodyHtml,
                    $formAddHtml,                
                ],
                file_get_contents(resource_path("/stubs/views/index.stub"))
            );

            $viewShowTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNameSingularUpperCaseFirstLetter}}',                
                    '{{tableShowDataHtml}}'
                ],
                [
                    $name,
                    ucfirst($name),
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst($name),                
                    $tableShowDataHtml,
                ],
                file_get_contents(resource_path("/stubs/views/show.stub"))
            );

            $viewEditTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNameSingularUpperCaseFirstLetter}}',                
                    '{{formEditHtml}}'
                ],
                [
                    $name,
                    ucfirst($name),
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst($name),                
                    $formEditHtml,
                ],
                file_get_contents(resource_path("/stubs/views/edit.stub"))
            );

            if(!file_exists($path = resource_path('/views/'.strtolower(str_plural($name)))))
                mkdir($path, 0777, true);

            file_put_contents(resource_path('/views/'.strtolower(str_plural($name))."/index.blade.php"),$viewIndexTemplate);
            file_put_contents(resource_path('/views/'.strtolower(str_plural($name))."/show.blade.php"),$viewShowTemplate);
            file_put_contents(resource_path('/views/'.strtolower(str_plural($name))."/edit.blade.php"),$viewEditTemplate);

        }else {
            $viewIndexTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNameSingularUpperCaseFirstLetter}}',
                    '{{tableHeadingHtml}}',
                    '{{tableBodyHtml}}',
                    '{{formAddHtml}}',                
                ],
                [
                    $name,
                    ucfirst(str_plural($name)),
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst($name),
                    $tableHeadingHtml,
                    $tableBodyHtml,
                    $formAddHtml,                
                ],
                file_get_contents(resource_path("/stubs/views/index.stub"))
            );

            $viewShowTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNameSingularUpperCaseFirstLetter}}',                
                    '{{tableShowDataHtml}}'
                ],
                [
                    $name,
                    ucfirst(str_plural($name)),
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst($name),                
                    $tableShowDataHtml,
                ],
                file_get_contents(resource_path("/stubs/views/show.stub"))
            );

            $viewEditTemplate = str_replace(
                [
                    '{{modelName}}',
                    '{{modelNamePluralUpperCaseFirstLetter}}',
                    '{{modelNamePluralLowerCase}}',
                    '{{modelNameSingularLowerCase}}',
                    '{{modelNameSingularUpperCaseFirstLetter}}',                
                    '{{formEditHtml}}'
                ],
                [
                    $name,
                    ucfirst(str_plural($name)),
                    strtolower(str_plural($name)),
                    strtolower($name),
                    ucfirst($name),                
                    $formEditHtml,
                ],
                file_get_contents(resource_path("/stubs/views/edit.stub"))
            );            
             if(!file_exists($path = resource_path('/views/'.strtolower(str_plural($name)))))
                mkdir($path, 0777, true);

            file_put_contents(resource_path('/views/'.strtolower(str_plural($name))."/index.blade.php"),$viewIndexTemplate);
            file_put_contents(resource_path('/views/'.strtolower(str_plural($name))."/show.blade.php"),$viewShowTemplate);
            file_put_contents(resource_path('/views/'.strtolower(str_plural($name))."/edit.blade.php"),$viewEditTemplate);
        }


    }

    protected function request($name,$indo){
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if(!file_exists($path = app_path('/Http/Requests')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }

    public function handle()
    {
        $name = $this->argument('name');

        if ($this->option('indo')) {
            $indo = true;
        } else {
            $indo = false;
        }

        $this->controller($name,$indo);
        $this->views($name,$indo);
        $this->model($name,$indo);
        //$this->request($name,$indo);

        \File::append(base_path('routes/web.php'), '
Route::delete(\'' . str_plural(strtolower($name)) . "/deleteAll', '{$name}Controller@deleteAll')->name('".str_plural(strtolower($name)).".deleteAll');");
        \File::append(base_path('routes/web.php'), '
Route::resource(\'' . str_plural(strtolower($name))."', '{$name}Controller');");
        
    }
}
