$(document).ready(function () {
    let create = $('#create'),
        submit = $('#submit');

    create.on('click', function () {
        $('#createModal').css({'display': 'block', 'opacity': 1})
        if ($("input[name=letter]").length === 0) {
            $.ajax({
                url: 'ajax/radioBtn.php',
                success: function (data) {
                    data = JSON.parse(data);
                    $.each(data, function (index, value) {
                        $('#js-radioBtn').append('<input type="radio" required name="letter" value="' + value.id + '" id="letter' + value.letter + '">' +
                            '<label for="letter' + value.letter + '">' + value.letter + '</label>')
                    })
                }
            })
        }
    })
    $('#close').on('click', function () {
        clearForm()
    })
    $('#closeBtn').on('click', function () {
        clearForm()
    })
    $('#js-radioBtn').on('change', function () {
        let letter = $('input[name=letter]:checked').val();
        if (letter === '1') {
            $('#subtype').val('подтип телепата');
        }
        if (letter === '2') {
            $('#subtype').val('подтип биоморфа');
        }
        if (letter === '3') {
            $('#subtype').val('подтип пирокинета');
        }
    })

    function clearForm() {
        $('#createModal').css({'display': 'none', 'opacity': 0})
        $('#formReference')[0].reset();
    }

    $('#formReference').on('submit', function (e) {
        e.preventDefault();
        let radio = $('input[name=letter]:checked').val(),
            surname = $('#surname').val(),
            name = $('#name').val(),
            patronymic = $('#patronymic').val(),
            reference = $('#reference').val(),
            superpower = $('#superpower').val(),
            subtype = $('#subtype').val(),
            formData = new FormData;

        formData.append('radio', radio);
        formData.append('surname', surname);
        formData.append('name', name);
        formData.append('patronymic', patronymic);
        formData.append('reference', reference);
        formData.append('superpower', superpower);
        formData.append('subtype', subtype);
        $.ajax({
            url: 'ajax/create.php',
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            enctype: 'multipart/form-data',
            success: function (data) {
                clearForm()
                if(data){
                    alert('Success')
                }else {
                    alert('Fail')
                }
                location.reload();
            },
            error: function () {
                alert('Fail')
            }
        })
        clearForm()
    })

    $('.js-update').on('click', function (e) {
        e.preventDefault();
        let id = $(this).closest('tr').find('td').eq(0).text(),
            lettterId = $(this).closest('tr').find('td').eq(1).text(),
            surname = $(this).closest('tr').find('td').eq(2).text(),
            name = $(this).closest('tr').find('td').eq(3).text(),
            patronymic = $(this).closest('tr').find('td').eq(4).text(),
            reference = $(this).closest('tr').find('td').eq(5).text(),
            superpower = $(this).closest('tr').find('td').eq(6).text(),
            subtype = $(this).closest('tr').find('td').eq(7).text();

        if ($("#js-radioBtnUpd input[name=letter]").length === 0) {
            $.ajax({
                url: 'ajax/radioBtn.php',
                success: function (data) {
                    data = JSON.parse(data);
                    $('#js-modal').append('<form method="POST" id="formUpdate">\n' +
                        '                        <div class="form-group" id="js-radioBtnUpd" ></div>' +
                        '                        <div class="form-group">\n' +
                        '                            <label for="surname">Surname</label>\n' +
                        '                            <input type="text" class="form-control col-6" value="' + surname + '" id="surnameUpd" name="surname"\n' +
                        '                                   placeholder="Surname">\n' +
                        '                            <input type="hidden" class="form-control col-6" value="' + id + '" id="idUpd" name="id"">\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group">\n' +
                        '                            <label for="name">Name</label>\n' +
                        '                            <input type="text" class="form-control col-6" value="' + name + '" id="nameUpd" name="nameUpd" placeholder="Name">\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group">\n' +
                        '                            <label for="patronymic">Patronymic</label>\n' +
                        '                            <input type="text" class="form-control col-6" value="' + patronymic + '" id="patronymicUpd" name="patronymic"\n' +
                        '                                   placeholder="Patronymic">\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group">\n' +
                        '                            <label for="reference">Number reference</label>\n' +
                        '                            <input type="number" class="form-control col-6" value="' + reference + '" id="referenceUpd" name="reference"\n' +
                        '                                   placeholder="Number reference">\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group">\n' +
                        '                            <label for="superpower">Description superpower</label>\n' +
                        '                            <input type="text" class="form-control col-6" value="' + superpower + '" id="superpowerUpd" name="superpower"\n' +
                        '                                   placeholder="Description superpower">\n' +
                        '                        </div>\n' +
                        '                        <div class="form-group">\n' +
                        '                            <label for="subtype">Description subtype</label>\n' +
                        '                            <input type="text" class="form-control col-6" value="' + subtype + '" id="subtypeUpd" name="subtype" disabled\n' +
                        '                                   placeholder="Description subtype">\n' +
                        '                        </div>\n' +
                        '                <div class="modal-footer">\n' +
                        '                    <button type="button" id="closeBtnUpdate" class="btn btn-secondary" data-dismiss="modal">Close</button>\n' +
                        '                    <button type="submit" id="submitUpdate" class="btn btn-primary">Submit</button>\n' +
                        '                </div>\n' +
                        '                    </form>')
                    $('#updateModal').css({'display': 'block', 'opacity': 1})
                    $.each(data, function (index, value) {
                        $('#js-radioBtnUpd').append('<input type="radio" required name="letter" value="' + value.id + '" id="letter' + value.letter + '">' +
                            '<label for="letter' + value.letter + '">' + value.letter + '</label>')
                    })
                    $('#js-radioBtnUpd input[name=letter]').eq(lettterId - 1).attr("checked", true);
                }
            })
        }
    })

    $(document).on('change','#js-radioBtnUpd', function () {
        let letter = $('input[name=letter]:checked').val();
        if (letter === '1') {
            $('#subtypeUpd').val('подтип телепата');
        }
        if (letter === '2') {
            $('#subtypeUpd').val('подтип биоморфа');
        }
        if (letter === '3') {
            $('#subtypeUpd').val('подтип пирокинета');
        }
    })
    $(document).on('submit', '#formUpdate', function (e) {
        e.preventDefault();
        let id = $('#idUpd').val(),
            radio = $('input[name=letter]:checked').val(),
            surname = $('#surnameUpd').val(),
            name = $('#nameUpd').val(),
            patronymic = $('#patronymicUpd').val(),
            reference = $('#referenceUpd').val(),
            superpower = $('#superpowerUpd').val(),
            subtype = $('#subtypeUpd').val(),
            formData = new FormData;

        formData.append('id', id);
        formData.append('radio', radio);
        formData.append('surname', surname);
        formData.append('name', name);
        formData.append('patronymic', patronymic);
        formData.append('reference', reference);
        formData.append('superpower', superpower);
        formData.append('subtype', subtype);
        $.ajax({
            url: 'ajax/update.php',
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            enctype: 'multipart/form-data',
            success: function (data) {
                clearFormUpdate()
                if(data){
                    alert('Success')
                }else {
                    alert('Fail')
                }
                location.reload();
            },
            error: function (){
                alert('Fail')
            }
        })
    })

    $('#closeUpdate').on('click', function () {
        clearFormUpdate()
    })
    $('#closeBtnUpdate').on('click', function () {
        clearFormUpdate()
    })
    function clearFormUpdate() {
        $('#updateModal').css({'display': 'none', 'opacity': 0})
        $('#formUpdate').remove();
    }
     $('.js-delete').on('click',function (e){
         e.preventDefault();
         if (confirm('Delete reference?')){
             let id = $(this).closest('tr').find('td').eq(0).text();
             $.ajax({
                 url:'ajax/delete.php?id='+id,
                 success: function (data){
                     clearForm()
                     if(data){
                         alert('Success')
                     }else {
                         alert('Fail')
                     }
                     location.reload();
                 }
             })
         }
     })
})