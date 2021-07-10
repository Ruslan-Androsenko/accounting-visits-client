<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>

    <div class="form-wrapper">
        <form method="post" id="{{ $formId }}">
            @csrf

            <div class="form-group radio-inputs">
                <label class="control-label" for="arrival">
                    <input class="control-radio-input" id="arrival" type="radio" name="Visit[type]" value="arrival" checked />
                    <span class="control-caption">Приход сотрудника</span>
                </label>

                <label class="control-label" for="departure">
                    <input class="control-radio-input" id="departure" type="radio" name="Visit[type]" value="departure" />
                    <span class="control-caption">Уход сотрудника</span>
                </label>
            </div>

            <div class="flex-wrapper">
                <div class="form-group">
                    <select class="control-select" name="Visit[employee_id]" required>
                        <option value="">Выберите сотрудника:</option>

                        @foreach ($employees as $key => $employee)
                            <option value="{{ $employee["id"] }}">{{ $employee["surname"] }} {{ $employee["name"] }} {{ $employee["patronymic"] }} - {{ $employee["personnel_number"] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="button-form">
                    <button type="submit">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        <span>Сохранить</span>
                    </button>
                </div>
            </div>
        </form>

        <div class="response-message"></div>
        <div class="error-message"></div>
    </div>
</x-layout>
