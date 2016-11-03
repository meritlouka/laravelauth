@extends('layouts.app')

@section('title', 'All Notes')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> All Notes</i>
                </div>

                <div class="panel-body">
                    @if ($notes->isEmpty())
                        <p>You have not created any notes.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>parent</th>
                                    <th>user</th>
                                     <th>content</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td>
                                    @foreach ($tags as $tag)
                                        @if ($tag->id === $note->tag_id)
                                            {{ $tag->name }}
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                       {{ $note->content }}
                                    </td>
                                    <td>
                                  
                                    </td>
                                    <td>{{ $note->updated_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection