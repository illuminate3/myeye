@extends('layouts.default')

@section('content')
    <div class="container-fluid taxonomy-filters">
        <section>
            <div class="container">
                <a class="mobile-only filters-dropdown"> Filters<i class="icon-down_arrow-xs"></i></a>
                <form name="taxonomy_filters" class="ng-pristine ng-valid">
                    <ul class="taxonomy-filters-options mobile-hide">
                        <!-- ngRepeat: filter in filters -->
                        <li class="taxonomy-filters-options-option ng-scope" ng-repeat="filter in filters">
                        <h1 class="ng-binding">View</h1><ol class="taxonomy-filters-options-option-values">
                        <!-- ngRepeat: option in filter.options -->
                        <li ng-repeat-start="option in filter.options" class="taxonomy-filters-options-option-values-value ng-scope toggled" ng-class="{ selected: option.selected, toggled: (filter.value === option.value) }">
                        <label class="ng-binding">
                        <!-- ngIf: filter.type === 'radio' -->
                        <input class="ng-hide ng-scope ng-pristine ng-valid" ng-if="filter.type === 'radio'" type="radio" name="view" ng-value="option.value" ng-model="filter.value" value="front">
                        <!-- end ngIf: filter.type === 'radio' --><!-- ngIf: filter.type !== 'radio' -->
                        Front </label></li><!-- ngIf: !$last -->
                        <li ng-repeat-end="" class="divider ng-scope" ng-if="!$last">/</li>
                        <!-- end ngIf: !$last --><!-- end ngRepeat: option in filter.options -->
                        <li ng-repeat-start="option in filter.options" class="taxonomy-filters-options-option-values-value ng-scope" ng-class="{ selected: option.selected, toggled: (filter.value === option.value) }">
                        <label class="ng-binding">
                        <!-- ngIf: filter.type === 'radio' -->
                        <input class="ng-hide ng-scope ng-pristine ng-valid" ng-if="filter.type === 'radio'" type="radio" name="view" ng-value="option.value" ng-model="filter.value" value="side right">
                        <!-- end ngIf: filter.type === 'radio' --><!-- ngIf: filter.type !== 'radio' --> Side </label>
                        </li><!-- ngIf: !$last --><!-- end ngRepeat: option in filter.options -->
                        </ol>
                        </li>
                    </ul>
                </form>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
            </div>
            <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
            </div>
            <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
            </div>
        </div>
    </div>

@endsection

@section('footer')
<div class="container">
    <footer>
        <p>© Company 2014</p>
    </footer>
</div>
@endsection
