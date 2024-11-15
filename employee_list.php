
<form method="GET" action="<?= base_url('employee/list'); ?>">
    <input type="text" name="search" placeholder="Search by name, gender, mobile">
    <input type="submit" value="Search">
</form>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Mobile</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
    <tr>
        <td><?= $employee->fname; ?></td>
        <td><?= $employee->lname; ?></td>
        <td><?= $employee->gender; ?></td>
        <td><?= $employee->mail; ?></td>
        <td><?= $employee->mobile_no; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- Pagination links -->
<div>
    <?php for ($i = 1; $i <= ceil($total_rows / 10); $i++): ?>
        <a href="<?= base_url('employee/list/' . $i); ?>"><?= $i; ?></a>
    <?php endfor; ?>
</div>
