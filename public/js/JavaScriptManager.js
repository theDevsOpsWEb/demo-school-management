JavaScriptManager = {

    getGradeClass: function (grade_id) {

        $.get('/grades/get-class/'+grade_id, {}, function (data) {
            $('#grade_class_id').html(data.classgrade);
            $('#subject_id').html(data.subjects);
        });

    },

    getSubjectForPayment: function () {

        let subjects = $('#subject_id').val(), grade_id = $('#grade_id').val();;

        $.get('/subjectsTotal', {subjects:subjects, grade_id: grade_id}, function (data) {

            let data_table = '<tr>\n' +
                '                    <th scope="row">1</th>\n' +
                '                    <td>Tution Fee</td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.tution+' <input type="hidden" value="'+data.tution+'" name="tution_fee"> </td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">2</th>\n' +
                '                    <td>Exam Fee</td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.exam+' <input type="hidden" value="'+data.exam+'" name="exam_fee"> </td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">3</th>\n' +
                '                    <td>Book Fee </td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.book+' <input type="hidden" value="'+data.book+'" name="book_fee"></td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">3</th>\n' +
                '                    <td>Projects Fee </td>\n' +
                '                    <td>3</td>\n' +
                '                    <td>'+data.projects+' <input type="hidden" value="'+data.projects+'" name="projects_fee"></td>\n' +
                '                </tr>\n' +
                '                <tr>\n' +
                '                    <th scope="row">4</th>\n' +
                '                    <td colspan="2">Total</td>\n' +
                '                    <td>'+data.total+' <input type="hidden" value="'+data.total+'" name="total_fee"></td>\n' +
                '                </tr>';

            $('#subject-amount').html(data_table);
            $('#payment_total').val(data.total).setAttribute('readonly').css('font-weight', 'larger');

        });
    },

    saveStudentData: function () {
        $.get('/saveStudent', {}, function (data) {

        });
    },

    getFilters: function () {

        $('#filters').css('display', 'block');
    },

    getReport: function (id)
    {
        $('#view').attr('src', '/studentProfile/'+id)
        $('#exampleModal').modal('show');
        

    }


}
