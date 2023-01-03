@if(isset($part))
        <script>
            $(document).ready(function () {
                $('.addToCart').click(function (e) {
                    e.preventDefault()
                    addToCart()
                })
            })

            function addToCart() {

                let id = "{{$part->name_parts}})"
                let name = "{{$part->price_1}}"

                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: 'POST',
                    url: "/add_to_cart",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        </script>
@endif


