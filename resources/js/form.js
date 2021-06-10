const quests = [];

function exclusaoQuest(quest_value) {
    document
        .querySelectorAll("span.quest")
        .forEach((quest, index) => {
            if (quest.innerText === quest_value) {
                document
                    .querySelectorAll("#container_quest li")
                [index].remove();
                quests.splice(index, 1);
            }
        });
}

function createLinessss(quest_value) {
    const container_quest =
    document.querySelector("#container_quest");
    const li = document.createElement("li");
    const span = document.createElement("span");
    const button_excluir = document.createElement("button");
    button_excluir.innerText = "Excluir";
    button_excluir.onclick = () => exclusaoQuest(quest_value);
    span.innerText = quest_value;
    span.className = "quest";
    li.appendChild(span);
    li.appendChild(button_excluir);
    container_quest.appendChild(li);
}

function createQuest() {
    const quest_value = document.querySelector(
        'input[name="quest"]',
    ).value;
    quests.push(quest_value);
    createLine(quest_value);
    document.querySelector('input[name="quest"]').value = "";
}

async function submitForm() {
    const name_form = document.querySelector(
        'input[name="form_name"]',
    ).value;
    const name_user =
        document.querySelector("#name_user").innerText;
    const body = { name_form, name_user, quests };
    const res = await (
        await fetch("/formularios/store", {
            method: "POST",
            body: JSON.stringify(body),
        })
    ).json();
}

function createInput() {
    const input_quest = document.querySelector(".inputs");
    const label = createElement("label");
    const input = createElement("input");
    input.setAttribute('name', "quests[]")
    label.innerText = "questões"
    label.appendChild(input);

    

    const button = document.createElement("button");
    button_excluir.innerText = "+";



}