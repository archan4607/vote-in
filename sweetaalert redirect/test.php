<html>
<body>
    <!-- window.location.href='temp.php'  -->
    <button onclick="check(); window.location.href='temp.php'">Submit</button>
    
    <script>
        function check() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>

    <!-- Sweet Alerts js -->
    <script src="new-js-sweetalert/sweetalert2.all.min.js"></script>
    <script src="new-js-sweetalert/jquery-3.6.0.min.js"></script>

</body>

</html>