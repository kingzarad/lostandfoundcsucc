<div class="row">
    <div class="col-lg-3"></div>
    <div class="col">

        <div class="card mt-4">

            <div class="card-body">


                <p class="card-title d-flex justify-content-between align-items-center"
                    style="background: #333; padding:10px;">
                    <span class="fs-6 text-white">Date: {{ $item->date }}</span>
                    <span>

                        @if ($item->purpose == 'found')
                            @if ($item->status == 'claimed')
                                <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                            @endif
                        @elseif ($item->purpose == 'lost')
                            @if ($item->status == 'found')
                                <span class="badge bg-primary">{{ ucfirst($item->status) }}</span>
                            @else
                                <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                            @endif

                        @endif
                    </span>
                </p>
                <div class="card-text mb-3 mt-3">
                    <div class="row">
                        <div class="col">
                            <table>
                                <tr>
                                    <td>Purpose: </td>
                                    <td>
                                        @if ($item->purpose == 'lost')
                                            <span class="text-warning">{{ Str::ucfirst($item->purpose) }}</span>
                                        @else
                                            <span class="text-primary">{{ Str::ucfirst($item->purpose) }}</span>
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
                                                {{ Str::ucfirst($category->categories_name) }}
                                            @endif
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td>Description: </td>
                                    <td> {{ Str::ucfirst($item->description ) }} </td>
                                </tr>
                                <tr>
                                    <td>Contact #: </td>
                                    <td> {{ $item->phonenum }} </td>
                                </tr>
                            </table>


                        </div>
                        <div class="col">
                            <div class="image-container">
                                <img class="img-thumbnail" src="{{ asset('storage/' . $item->image) }}"
                                    alt="Product Image">
                            </div>
                        </div>
                    </div>
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
