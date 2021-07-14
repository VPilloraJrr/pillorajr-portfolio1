<!DOCTYPE html>
<html>
<head>
    <title>Education Management | Edit</title>
</head>
    <body>
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
    </body>
</html>