<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Nav extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model =  \App\Models\Nav::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        /*
         * TODO:
         *  - https://github.com/mertasan/nova-sortable/tree/nova4 better sortable
         */
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make("Element name in navigation", "name")->rules('required'),

            //Text::make("custom url", "url")->placeholder("default: page url"), kann evtl. noch gemacht werden
            Select::make('Type', 'type')
                ->options([
                    'page' => 'page',
                    'internal_link' => 'interner link',
                    'external_link' => 'externer link'
                ])->rules('required'),

            BelongsTo::make("page")
                ->nullable()
                ->hide()
                ->dependsOn('type', function (BelongsTo $field, NovaRequest $request, FormData $formData) {
                    if($formData->type === 'page')
                    {
                        $field->show()->rules(['required']);
                    }
                }),

            Text::make("Link", "link")
                ->hide()
                ->dependsOn('type', function (Text $field, NovaRequest $request, FormData $formData) {
                    if($formData->type === 'external_link')
                    {
                        $field->show()->rules(['required'])->placeholder("http://example.com/your-desired-page");
                    }
                    if($formData->type === 'internal_link')
                    {
                        $field->show()->rules(['required'])->placeholder("Interner slug. Bsp: 'admin/page' (ohne Anführungszeichen) für ':url'");
                    }
                }),


            BelongsTo::make("Parent", "parent", "App\Nova\Nav")->nullable(),

            Number::make("position left", "lft")
                ->hide()
                ->sortable()
                ->dependsOn('parent', function (Number $field, NovaRequest $request, FormData $formData) {
                    if($formData->parent == '')
                    {
                        $field->show()->rules("unique:nav_items,lft");
                    }
                }),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
