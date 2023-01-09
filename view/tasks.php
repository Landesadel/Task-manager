<?php
/**
 * @var Task $task
 */
?>
<head>
    <meta charset="UTF-8">
    <title>Tasks</title>
    <style>
        .flex_cont {
            display: flex;
        }
        .task_btn {
            margin: 17px;
        }
    </style>
</head>

<body>
    <a href="/?controller=security&action=logout">Logout</a> <br>
    <a href="/">General</a>
    <br><br>
    <form method="post" action="/?controller=tasks&action=add">
        <input type="text" name="task" placeholder="Add your task">
        <input type="submit" value="Add+">
    </form>
    <h3><?=$username?>, ваши приоритетные задачи на сегодня: </h3>
    <ol>
    <?php foreach ($tasks as $task): ?>
        <li id="<?=$task->getId()?>">
            <form class="flex_cont">
                <p><?= $task->getDescription() ?></p>
                <a href="/?controller=tasks&action=done&id=<?=$task->getId()?>">[Done]</a>
                <input class="done task_btn" type="checkbox" data-id="<?$task->getId()?>">
            </form>

        </li>
    <?php endforeach;?>
    </ol>

    <script>
        let buttons = document.querySelectorAll('.done');
        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                (
                    async () => {
                        const response = await fetch('/?controller=tasks&action=apidone&id=' + id);
                        const answer = await response.json();
                        document.getElementById(answer.id).remove();
                    }
                )();
            })
        })
    </script>
</body>




