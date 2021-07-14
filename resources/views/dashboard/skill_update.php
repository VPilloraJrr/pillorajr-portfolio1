<!DOCTYPE html>
<html>
<head>
    <title>Skill Management | Edit</title>
</head>
    <body>
        <form action = "/dashboard/skill/edit/<?php echo $data[0]->id; ?>" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <table>
                <tr>
                    <td>Skill Name</td>
                    <td>
                        <input type = 'text' name = 'skill_name' value = '<?php echo $data[0]->skill_name; ?>'/> </td>
                </tr>
                <tr>
                    <td>Percent</td>
                    <td>
                        <input type = 'text' name = 'percent' value = '<?php echo$data[0]->percent; ?>'/>
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
                        <input type = 'submit' value = "Update Skill" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>