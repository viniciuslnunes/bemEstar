function createInput() {
    const input_quest = document.querySelector("#container-inputs");
    const input_quest_value = document.querySelector("#input_quest");
    const input = document.createElement("input");
    input.className = "form-control";
    const div = document.createElement('div');
    const button_excluir = document.createElement('button');
    const id_input = Math.round((Math.random() + 1) * 10);
    div.className = 'd-flex flex-nowrap';
    input.name = "quest[]";
    input.placeholder = "Digite uma questão";
    input.type = "text";
    input.className = "form-control mr-4 mb-0 mt-4";
    input.id = id_input;
    input.value = input_quest_value.value;
    button_excluir.type = "button";
    button_excluir.innerText = "Excluir";
    button_excluir.className = "btn btn-danger mt-4";
    button_excluir.onclick = () => {
        div.remove()
    };
    input_quest_value.value = "";
    div.appendChild(input);
    div.appendChild(button_excluir);
    input_quest.appendChild(div);
}