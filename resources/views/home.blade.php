@extends('layouts.app')

@section('title', 'Mutlusan Electric | Ana Sayfa')
@section('description', 'Mutlusan Electric - Konut ve endüstriyel elektrik sistemlerinde Türkiye\'nin güvenilir üreticisi.')

@section('content')
    @include('partials.hero')
    @include('partials.stats-strip')
    @include('partials.about')
    @include('partials.products')
    @include('partials.blog')
@endsection
