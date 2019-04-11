@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>المعمد والمنفذ</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">المعمد والمنفذ</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">المعمد والمنفذ </h3>

                    <form action="{{ route('dashboard.baptists.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                    
                                     @if (auth()->user()->hasPermission('update_baptists'))
                                           <a href="{{ route('dashboard.baptists.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                    
                                        @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

               

                    @if ($baptists->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                            <th>@lang('site.num')</th>
                                <th>إسم المعمد</th>
                                <th>إسم المنفذ</th>
                                <th>الجوال</th>
                                <th>جوال آخر</th>
                                <th>الارضى</th>
                                <th>أرضى آخر</th>
                                <th>رقم الحساب1</th>
                                <th>رقم الحساب 2</th>
                                <th>اسم البنك 1</th>
                                <th>اسم البنك 2</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($baptists as $baptist)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $baptist->name1 }}</td>
                                    <td>{{ $baptist->name2 }}</td>
                                    <td>{{ $baptist->phone1 }}</td>
                                    <td>{{ $baptist->phone2 }}</td>
                                    <td>{{ $baptist->mobile1 }}</td>
                                    <td>{{ $baptist->mobile2 }}</td>
                                    <td>{{ $baptist->account1 }}</td>
                                    <td>{{ $baptist->account2 }}</td>
                                    <td>{{ $baptist->bank1 }}</td>
                                    <td>{{ $baptist->bank2 }}</td>


                                   <td>
                                        @if (auth()->user()->hasPermission('update_baptists'))
                                            <a href="{{ route('dashboard.baptists.edit', $baptist->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_baptists'))
                                            <form action="{{ route('dashboard.baptists.destroy', $baptist->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


           <!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
