+<?php require_once '../app/views/includes/header.php';?>
+
+<h3>Search Contacts</h3>
+
+<?php if($data['messages']){ ?>
    +<div class="messages">
        +    <?php echo reset($data['messages']['update']); ?>
        +</div>
    +<?php } ?>
+
+<form class="form form--search-contacts">
    +    <div class="form__container">
        +        <input class="form__input" type="text" name="name" value="" placeholder="Contact name" style="flex-grow: 2">
        +        <input class="form__submit" type="submit" value="Search">
        +    </div>
    +</form>
+
+<table class="table table--contacts">
    +    <thead>
    +        <tr>
        +            <th>Name</th>
        +            <th>Email</th>
        +            <th>Active</th>
        +            <th>Edit</th>
        +        </tr>
    +    </thead>
    +    <tbody>
    +        <?php foreach($data['contacts'] as $contact){ ?>
        +        <tr>
            +            <td><?php echo $contact['first_name'] . " " . $contact['last_name'];?></td>
            +            <td><?php echo $contact['email'];?></td>
            +            <td><?php echo $contact['active'] == '1' ? 'Yes' : 'No';?></td>
            +            <td><a href="/edit/<?php echo $contact['id'];?>" class="button button--red">Edit</a></td>
            +        </tr>
        +        <?php } ?>
    +    </tbody>
    +</table>
+
+</section>
+
+<?php require_once '../app/views/includes/footer.php';?>