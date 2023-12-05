@extends('layouts.customerBody')
@section('content')

        <div class="page-wrapper ms-0">
            <div class="content">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 tabs_wrapper">
                        <div class="page-header">
                            <div class="page-title">
                                <h4>Menu List</h4>
                                <h6>Manage your Orders Here</h6>
                            </div>
                        </div>

                        <ul class="tabs owl-carousel owl-theme owl-product border-0">
                            @foreach($categories as $category)
                            <li class="{{ $loop->first ? 'active' : '' }}" id="{{ $category->id }}">
                                <div class="product-details">
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="img" />
                                    <h6>{{ $category->name }}</h6>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <div class="tabs_container">
                            @foreach($categories as $category)
                            <div class="tab_content {{ $loop->first ? 'active' : '' }}" data-tab="{{ $category->id }}">
                                <div class="row">
                                    @foreach($menus as $menu)
                                    @if($menu->menu_category_id === $category->id)
                                    <div class="col-lg-3 col-sm-6 d-flex">
                                        <div class="productset flex-fi">
                                            <div class="productsetimg">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt="img" />
                                            </div>
                                            <div class="productsetcontent">
                                                <h5>{{ $category->name }}</h5>
                                                <h4>{{ $menu->menuName }}</h4>
                                                <h6>{{ $menu->price }}</h6>
                                                <button class="add-to-cart-button">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>





    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .productsetcontent {
            margin: 0;
        }

        .add-to-cart-button {
            width: 100%;
            padding: 10px 0;
            margin: 0;
            background-color: #4caf50;
            color: white;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }

        .add-to-cart-button:hover {
            background-color: #45a049;
        }
    </style>

<script>
    const imageToAdjust =
        document.getElementById("imageToAdjust");

    const adjustImageOrientation = () => {
        const img = new Image();
        img.src = imageToAdjust.src;

        img.onload = function() {
            const width = img.width;
            const height = img.height;

            if (width > height) {
                const canvas = document.createElement("canvas");
                canvas.width = height;
                canvas.height = width;
                const ctx = canvas.getContext("2d");
                ctx.rotate(Math.PI / 2);
                ctx.drawImage(img, 0, -width, height, width);

                imageToAdjust.src = canvas.toDataURL("image/jpeg");
            }
        };
    };

    adjustImageOrientation();
</script>

@endsection
