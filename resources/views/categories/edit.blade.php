@extends("layout")

@section("page-content")
    <div class="px-4 pt-4">
        <div>
            <h3>Categories</h3>
        </div>
        <div class="my-4">
            @if(session()->has('success-status'))
                <div class="card bg-success">
                    <div class="card-body text-white">
                        {{session('success-status')}}
                    </div>
                </div>
            @endif
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                        class="nav-link "
                        id="view-tab"
                        href={{ route('categories.index') }}
                                aria-controls="view-tab-pane"
                        aria-selected="true">
                    View
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <button
                        class="nav-link active"
                        id="new-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#new-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="new-tab-pane"
                        aria-selected="false">
                    Edit
                </button>
            </li>
        </ul>
        <div class="tab-content mt-2">
            <div class="tab-pane  active" id="new-tab-pane" role="tabpanel">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form class="mt-8" action="{{ route('categories.update',$category->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="institution_id" value="{{$institution_id}}">
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Code</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="text"
                                           name="code"
                                           value="{{ old('code') ?? $category->code}}"
                                           class="form-control @error('code') is-invalid @enderror">
                                    @error('code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10 has-validation">
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name') ?? $category->name }}"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10 has-validation">
                                    <textarea
                                            name="description"
                                            class="form-control @error('description') is-invalid @enderror">{{old('description') ?? $category->description}}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label  class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit">
                                        <span>Update</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
