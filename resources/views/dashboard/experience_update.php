<!DOCTYPE html>
<html>
<head>
    <title>Education Management | Edit</title>
</head>
    <body>
        <form action = "/dashboard/experience/edit/<?php echo $data[0]->id; ?>" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <table>
                <tr>
                    <td>Position Name</td>
                    <td>
                        <input type = 'text' name = 'position_name' value = '<?php echo $data[0]->position_name; ?>'/> </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <input type = 'text' name = 'description' value = '<?php echo$data[0]->description; ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Year Started</td>
                    <td>
                        <input type = 'text' name = 'year_started' value = '<?php echo$data[0]->year_started; ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Year Resigned</td>
                    <td>
                        <input type = 'text' name = 'year_resigned' value = '<?php echo$data[0]->year_resigned; ?>'/>
                    </td>
                </tr>
                <tr>
                    <td colspan = '2'>
                        <input type = 'submit' value = "Update Experience" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>