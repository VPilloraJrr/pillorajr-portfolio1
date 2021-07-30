<!DOCTYPE html>
<html>
<head>
    <title>Education Management | Edit</title>
</head>
    <style>
        div{
            border: 1px solid grey;
            margin-left:10%;
            margin-right:10%;
        }
        td{
            padding:5px;
        }
        div.card-body form{
            margin-top:10px;
            padding-bottom:10px;
        }
        div.card-header{
            background: #f7f7f7;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding-top: 2%;
            padding-bottom: 2%;
            margin-top:10px;    
        }
        .flex-center {
            align-content: center;
            display: grid;
            justify-content: center;
        }
        .submit{
            margin-top: 20px;
            padding-left:100px;
            padding-right:100px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>
    <body>
        <div class="card-header flex-center">Edit Education</div>
        <div class="card-body flex-center">
            <form action = "/dashboard/education/edit/<?php echo $data[0]->id; ?>" method = "post">
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <table>
                    <tr>
                        <td>School Name</td>
                        <td>
                            <input type = 'text' name = 'school_name' value = '<?php echo $data[0]->school_name; ?>'/> </td>
                    </tr>
                    <tr>
                        <td>Year_started</td>
                        <td>
                            <input type = 'text' name = 'year_started' value = '<?php echo$data[0]->year_started; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Year Graduated</td>
                        <td>
                            <input type = 'text' name = 'year_graduated' value = '<?php echo$data[0]->year_graduated; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td>Logo</td>
                        <td>
                            <input type = 'file' name = 'logo' value = '<?php echo$data[0]->logo; ?>'/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = '2'>
                            <input type = 'submit' value = "Update Education" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>