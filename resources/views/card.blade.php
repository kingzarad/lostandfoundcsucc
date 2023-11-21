<div class="row">
    <div class="col-lg-3"></div>
    <div class="col">

        <div class="card mt-4">

            <div class="card-body">


                <p class="card-title d-flex justify-content-between align-items-center">
                    <span class="fs-6">Date: {{ $item->date }}</span>
                    <span>

                        @if ($item->returnTo == 'found')
                            @if ($item->status == 'found')
                                <span class="badge bg-primary">{{ ucfirst($item->status) }}</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                            @endif
                        @elseif ($item->returnTo == 'lost')
                            @if ($item->status == 'claimed')
                                <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                            @endif
                        @endif
                    </span>
                </p>
                <div class="card-text mb-3 mt-3">

                    <table>
                        <tr>
                            <td>Purpose: </td>
                            <td>
                                @if ($item->returnTo == 'lost')
                                    <span class="text-warning">{{ Str::ucfirst($item->returnTo) }}</span>
                                @else
                                    <span  class="text-primary">{{  Str::ucfirst($item->returnTo)}}</span>
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <td>Location: </td>
                            <td> {{ $item->location }} </td>
                        </tr>
                        <tr>
                            <td>Category: </td>
                            <td>
                                @foreach ($categories as $category)
                                    @if ($category->id == $item->categories_id)
                                        {{ $category->categories_name }}
                                    @endif
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td> {{ $item->description }} </td>
                        </tr>
                    </table>

                    <div class="alert border-primary alert-dismissible fade show mt-3" role="alert">
                        <i class="bi bi-question me-1"></i>
                        For more detail, please <a href="#contact">contact</a> us or visit us in our office.
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class=" col-lg-3"></div>
</div>
