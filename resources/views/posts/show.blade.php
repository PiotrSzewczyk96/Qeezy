@extends('layouts.app')

@section('subheader')
	<x-layout.subheader description="Przeglądaj" />
@stop

@section('toolbar')
		<a href="{{ route('posts.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $post)
			<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $post)
			<a onclick='document.getElementById("posts_destroy_{{ $post->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'posts.destroy', $post->id ], 'id' => 'posts_destroy_' . $post->id ]) }}{{ Form::close() }}
		@endcan
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-row">
		<div class="flex-row-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-custom gutter-b">
						<div class="card-body" style="padding: 3.5rem 4rem !important;">
							<div>
								<div class="d-flex align-items-center pb-4">
									<div class="d-flex flex-column flex-grow-1">
										<span class="text-dark-75 text-primary mb-2 font-size-h4 font-weight-bold">{{ $post->title }}</span>
										<div class="d-flex">
											<div class="d-flex align-items-center pr-5">
												@include('svg.post-category', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<a href="{{ route('posts.index', ['category' => $post->postCategory->id]) }}" class="text-muted font-weight-bold">{{ $post->postCategory->name }}</a>
											</div>
											<div class="d-flex align-items-center pr-5">
												@include('svg.user', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<a href="{{ route('users.show', $post->user->id) }}" class="text-muted font-weight-bold">{{ $post->user->full_name }}</a>
											</div>
											<div class="d-flex align-items-center pr-5">
												@include('svg.time', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<span href="{{ route('posts.show', $post->id) }}" class="text-muted font-weight-bold" title="{{ $post->updated_at }}">{{ date('Y-m-d', strtotime($post->updated_at)) }}</span>
											</div>
										</div>
									</div>
								</div>
								<style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>
								<div>
									<div class="show-post text-dark-75 font-size-lg font-weight-normal">
										{!! $post->content !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop