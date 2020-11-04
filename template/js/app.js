async function getTasks() {
    let res = await fetch('http://localhost/calendar/api/tasks/1?token=750909f329dad214f5f66acaee61f84a');
    let tasks = await res.json();
    document.querySelector('.task__wrapeer').innerHTML = '';
    tasks.forEach(task => {
        document.querySelector('.task__wrapeer').innerHTML += `
        <div class="task__item">
            <div class="task__header">
                <h2 class="task__title"><a href="task/${task.id}">${task.title}</a></h2>
                <div class="start__date">${task.created_date}</div> -
                <div class="end__date">${task.end_date}</div>
            </div>
            <div class="task__text">
                <p>${task.text}</p>
            </div>

            <div class="task__btn">
                <a href="#" class="task__delete" onclick=deleteTask(${task.id})>Удалить</a>
            </div>
        </div>
        `;
    });
}


async function addTask() {
    let submit = document.querySelector('#submit');
    let title = document.querySelector('#task-title').value;
    let text = document.querySelector('#task-text').value;
    let created_date = document.querySelector('#created-date').value;
    let end_date = document.querySelector('#end-date').value;


    if (title.length == 0) {
        return false;
    }

    let formData = new FormData();
    formData.append('title', title);
    formData.append('text', text);
    formData.append('created_date', created_date);
    formData.append('end_date', end_date);

    const res = await fetch('http://localhost/calendar/api/task/create?token=750909f329dad214f5f66acaee61f84a', {
        method: 'POST',
        body: formData
    });

    const data = await res.json();
    if (data.status) {
        document.querySelector('.success__msg').style.display = "block";
    }
}

async function deleteTask(taskId) {
    const res = await fetch(`http://localhost/calendar/api/task/delete/${taskId}?token=750909f329dad214f5f66acaee61f84a`, {
        method: 'DELETE'
    });

    const data = await res.json();
    if (data.status) {
        location.reload();
        await getTasks();
    }

}