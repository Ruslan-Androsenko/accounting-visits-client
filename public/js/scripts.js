"use strict";

$(function (){
    $(".form-wrapper .phone").mask("+7_(999)_999-99-99");
    $(".form-wrapper .personnel-number").mask("9999-9999");


    $("#create_employee").submit(function (e){
        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "/employee/",
            dataType: "json",
            data: $(this).serialize()
        }).done(function (response) {
            if (response.success) {
                $(".response-message").html(response.message);
            } else {
                $(".error-message").html(response.message);
            }
        });
    });

    $("#update_employee").submit(function (e){
        e.preventDefault();
        var employeeId = $(this).find("#employeeId").val();

        $.ajax({
            method: "PUT",
            url: "/employee/" + employeeId + "/",
            dataType: "json",
            data: $(this).serialize()
        }).done(function (response) {
            if (response.success) {
                $(".response-message").html(response.message);
            } else {
                $(".error-message").html(response.message);
            }
        });
    });

    $(".table-wrapper a.delete").click(function (e){
        e.preventDefault();
        var employeeId = $(this).data("id");

        if (employeeId > 0) {
            $.ajax({
                method: "DELETE",
                url: "/employee/" + employeeId + "/",
                dataType: "json",
            }).done(function (response) {
                if (response.success) {
                    location.reload();
                }
            });
        }
    });

    $("#create_fixing").submit(function (e){
        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "/visit/",
            dataType: "json",
            data: $(this).serialize()
        }).done(function (response) {
            if (response.success) {
                $(".response-message").html(response.message);
            } else {
                $(".error-message").html(response.message);
            }
        });
    });
});
