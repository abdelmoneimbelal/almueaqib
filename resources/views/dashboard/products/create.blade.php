@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.add_products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.products.index') }}"> @lang('site.products')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        {{--@foreach (config('translatable.locales') as $locale)--}}
                            {{--<div class="form-group">--}}
                                {{--<label>@lang('site.' . $locale . '.name')</label>--}}
                                {{--<input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ old($locale . '.name') }}">--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.number')</label>
                            <input type="number" name="number" class="form-control" value="{{ old('number') }}">
                        </div>

                        <div class="form-group">
                            <label>رقم السند</label>
                            <input type="number" name="num_saned" class="form-control" value="{{ old('num_saned') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="category_id" class="form-control">
                                <option value="">@lang('site.all_categories')</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>@lang('site.type_of_transaction')</label>
                            <input type="text" name="type_of_transaction" class="form-control" value="{{ old('type_of_transaction') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.fees')</label>
                            <input type="number" name="fees" class="form-control" value="{{ old('fees') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.fee')</label>
                            <input type="number" name="fee" class="form-control" value="{{ old('fee') }}">
                        </div>


                        <div class="form-group">
                            <label>@lang('site.other_fees')</label>
                            <input type="number" name="other_fees" class="form-control" value="{{ old('other_fees') }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.other_fee')</label>
                            <input type="number" name="other_fee" class="form-control" value="{{ old('other_fee') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
