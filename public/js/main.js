$(document).ready(function() {
        window._token = $('meta[name="csrf-token"]').attr('content')

        moment.updateLocale('en', {
            week: { dow: 1 } // Monday is the first day of the week
        })

        $('.date').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: 'en',
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
            }
        })

        $('.datetime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            locale: 'en',
            sideBySide: true,
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
            }
        })

        $('.timepicker').datetimepicker({
            format: 'HH:mm:ss',
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down',
                previous: 'fas fa-chevron-left',
                next: 'fas fa-chevron-right'
            }
        })

        $('.select-all').click(function() {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function() {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })

        $('.select2').select2()

        $('.treeview').each(function() {
            var shouldExpand = false
            $(this).find('li').each(function() {
                if ($(this).hasClass('active')) {
                    shouldExpand = true
                }
            })
            if (shouldExpand) {
                $(this).addClass('active')
            }
        })

        $('.c-header-toggler.mfs-3.d-md-down-none').click(function(e) {
            $('#sidebar').toggleClass('c-sidebar-lg-show');

            setTimeout(function() {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            }, 400);
        });

        //var para = 0;

        // Javascript for shipment show/checkout page
        $('#openModel').on("click", function(e) {
            e.preventDefault();
            $('#Modal').modal('show');
            para = 0;
        });

        //alert(response);
        var myModal = $('#Modal').on('shown.bs.modal', function(e) {
            //alert('../shipments/'+shipment_id+'/getAWB');

            $.ajax({
                url: '../shipments/' + shipment_id + '/createIuopOrder',
                type: 'get',
                //dataType: 'json',
                //data: $('#shipper_address :input').serialize()+ "&j_country=" + $('#j_country').val(),
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    $('#resultAWB').html('<h2>' + response + '</h2>');
                    $('#ModalLabel').html('AWB generated successfully.');

                    $('#modalMsg').html('Page refreshing in: ');

                    var count = 5;
                    var timer = setInterval(function() {

                        //var count = $('span.countdown').html();
                        if (count > 1) {
                            $('span.countdown').html(count + ' Seconds');
                            count = count - 1;
                        } else {
                            myModal.modal('hide');
                            clearInterval(timer);
                        }
                    }, 1000);

                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#resultAWB').html('<h2>' + response + '</h2>');
                    $('#ModalLabel').html('Error');
                    setTimeout(
                        function() {
                            myModal.modal('hide');
                        }, 5000);

                },


            });
        });


        $('#Modal').on('hidden.bs.modal', function(e) {
            window.location.reload();
        });

        $('#form').on('shown.bs.modal', function(e) {

            var timer = setInterval(function() {

                var count = $('span.countdown').html();
                if (count > 1) {
                    $('span.countdown').html(count - 1);
                } else {
                    $('#form').modal('toggle');
                    clearInterval(timer);
                }
            }, 1000);
        });

        $('.unit li').click(function(e) {
            $(this).parent().parent().find('input').val($(this).text());
        });
    }) //--Jquery end