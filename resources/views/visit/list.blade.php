<x-layout>
    <x-slot name="title">Табель посещений сотрудников</x-slot>

    <div class="filter-sorting-wrapper">
        <form id="filter_sorting_form">
            <div class="form-group">
                <label class="control-label" for="filterDate">
                    <span>Фильтр по дате: </span>
                    <input class="control-input" id="filterDate" type="date" name="filterDate" value="{{ $queries["filterDate"] ?? "" }}" />
                </label>
            </div>

            <div class="form-group">
                <select class="control-select" name="filterEmployee">
                    <option value="">Фильтр по сотруднику:</option>

                    @foreach ($employees as $key => $employee)
                        <option value="{{ $employee["id"] }}" {{ $queries["filterEmployee"] == $employee["id"] ? "selected='selected'" : "" }}>
                            {{ $employee["surname"] }} {{ $employee["name"] }} {{ $employee["patronymic"] }} - {{ $employee["personnel_number"] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <select class="control-select" name="orderByDate">
                    <option value="">Сортировка:</option>
                    <option value="asc" {{ $queries["orderByDate"] == "asc" ? "selected='selected'" : "" }}>дата по возрастанию</option>
                    <option value="desc" {{ $queries["orderByDate"] == "desc" ? "selected='selected'" : "" }}>дата по убыванию</option>
                </select>
            </div>

            <div class="button-form">
                <button type="submit">
                    <i class="fa fa-filter" aria-hidden="true"></i>
                    <span>Применить</span>
                </button>
            </div>
        </form>
    </div>

    <div class="table-wrapper">
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Табельный номер</th>
                <th>Тип</th>
                <th>Дата и время</th>
            </tr>
            </thead>

            <tbody>

                @foreach ($visits as $key => $visit)
                <?
                    $visitType = isset($visit["type"]) && $visit["type"] == "arrival" ? "приход" : "уход";
                    $dateCreate = date("d.m.Y H:i:s", strtotime($visit["created_at"]));
                ?>
                    <tr class="row-{{ $visit["type"] }}">
                        <td>{{ $visit["employee"]["surname"] }}</td>
                        <td>{{ $visit["employee"]["name"] }}</td>
                        <td>{{ $visit["employee"]["patronymic"] }}</td>
                        <td>{{ $visit["employee"]["personnel_number"] }}</td>
                        <td>{{ $visitType }}</td>
                        <td>{{ $dateCreate }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
