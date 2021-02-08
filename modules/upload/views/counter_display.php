<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 7/17/15
 * Time: 1:13 PM
 */
?>
<section>
    <table>
        <thead>
            <tr>
                <th>Ip</th>
                <th>User Agent</th>
                <th>Date and Time</th>
                <th>Hits</th>
            </tr>
        </thead>
        <?php
        foreach ($upload_manager->getList() as $upload)
            echo '
            <tbody>
                <tr>
                    <td>'. $upload->getIp(). '</td>
                    <td>'. $upload->getAgent().'</td>
                    <td>'. $upload->getDatetime().'</td>
                    <td>'.$upload->getHits().'</td>
                </tr>
            </tbody>'. "\n";
        ?>
    </table>
</section>