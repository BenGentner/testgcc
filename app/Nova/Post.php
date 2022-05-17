<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends \Webfactor\WfBasicFunctionPackage\Nova\Post
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
//    public static $model = parent::$model;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
//    public static $title = parent::$title;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
//    public static $search = parent::$search;


    public static function indexQuery(NovaRequest $request, $query)
    {
        $query->when(empty($request->get('orderBy')), function(Builder $q) {
            $q->getQuery()->orders = [];

            return $q->orderBy("created_at", "desc");
        });
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make("Title", "title")->rules("max:255", "required")->sortable(),
            DateTime::make("created at", "created_at")->sortable()->exceptOnForms(),
            Text::make("Slug", "slug")->rules("max:255", "required")->hideFromIndex()
                ->creationRules("unique:posts,slug")
                ->updateRules('unique:posts,slug,{{resourceId}}'),
            BelongsTo::make("User", "user")->exceptOnForms()->sortable(),
            BelongsTo::make("Creator", "creator", User::class)->exceptOnForms()->sortable(),
            NovaTinyMCE::make("Post-Body", "body")->rules("max:65535", "required")
                ->displayUsing(function ($body) {
                    return strip_tags($body);
                }),
            Images::make('News Image', 'post-image')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return
            array_merge(parent::cards($request),
                [
//                      new cards
                ],
            );
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return
            array_merge(parent::filters($request),
                [
//                      new filters
                ],
            );
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return
            array_merge(parent::lenses($request),
                [
//                      new lenses
                ],
            );
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return
            array_merge(parent::actions($request),
                [
//                      new actions
                ],
            );
    }
}
