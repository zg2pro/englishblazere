/*!
 * jquery.formvalidation v1.1.1
 * jQuery JavaScript Plugin for jQuery v1.4.2
 * http://jquery.com/
 *
 * Copyright 2010, Patrice CHASSAING
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://p.chas.free.fr/
 *
 * Date: Fri Feb 18 2011
 */
var fvregional = new Array('dflt');
fvregional['dflt'] = {
    fvIntroText: 'Invalid fields:',
    fvMustBeText: 'enter a text value',
    fvMustBeFileName: 'provide a full path & file name',
    fvMustBeSelect: 'select a value',
    fvMustBeSelMul: 'select at least one value',
    fvMustBeChboxChckd: 'check at least one value',
    fvMustBeRadioChckd: 'check a value',
    fvMustBeDate: 'enter a date',
    fvMustBeDateTime: 'enter a datetime',
    fvMustBeMonth: 'enter a month',
    fvMustBeTime: 'enter a time',
    fvMustBeWeek: 'enter a week',
    fvMustBeNb: 'enter a number',
    fvMustBeTel: 'enter a tel',
    fvMustBeUrl: 'enter an url',
    fvMustBeDflt: 'enter a value'
};
 

function FieldsFoundNotValid(fieldsnameArr) {
    var fieldsnameArrNb = fieldsnameArr.length;
    var fieldsnameArrnotValid = [];
    var fieldsnameArrnotValidNb = 0;
    for (fai = 0; fai < fieldsnameArrNb; fai++) {
        jQSelector = "[name='" + fieldsnameArr[fai] + "']";
        fieldobj = $(jQSelector);
        fieldtype = fieldobj.attr('type');
        switch (fieldtype) {
        case "textarea":
        case "password":
        case "text":
        case "file":
            fieldvalue = fieldobj.val();
            break;
        case "select-one":
            fieldvalue = $(jQSelector + ' option:selected').val();
            break;
        case "select-multiple":
            fieldvalue = $(jQSelector + ' option:selected').val();
            break;
        case "checkbox":
            fieldvalue = $(jQSelector + ':checked').val();
            break;
        case "radio":
            fieldvalue = $(jQSelector + ':checked').val();
            break;
            //HTML 5 compliants
        case "date":
            fieldvalue = fieldobj.val();
            break;
        case "datetime":
        case "datetime-local":
            fieldvalue = fieldobj.val();
            break;
        case "month":
            fieldvalue = fieldobj.val();
            break;
        case "time":
            fieldvalue = fieldobj.val();
            break;
        case "week":
            fieldvalue = fieldobj.val();
            break;
        case "number":
            fieldvalue = fieldobj.val();
            break;
        case "tel":
            fieldvalue = fieldobj.val();
            break;
        case "url":
            fieldvalue = fieldobj.val();
            break;
        default:
            fieldvalue = fieldobj.val();
            break;
        };

        if (fieldvalue === '' || fieldvalue === undefined) {
            fieldsnameArrnotValid[fieldsnameArrnotValidNb] = fieldobj;
            fieldsnameArrnotValidNb = fieldsnameArrnotValidNb + 1;
        }
        else {
            fieldobj.removeClass('error');
        }
    };

    return fieldsnameArrnotValid;
}

function getValueRequiredType(jQobj) {
    fieldtype = jQobj.attr('type');
    if (jQobj.hasClass('date')) {
        fieldtype = 'date';
    }
    else if (jQobj.hasClass('datetime')) {
        fieldtype = 'datetime';
    }
    else if (jQobj.hasClass('datetime-local')) {
        fieldtype = 'datetime-local';
    }
    else if (jQobj.hasClass('month')) {
        fieldtype = 'month';
    }
    else if (jQobj.hasClass('time')) {
        fieldtype = 'time';
    }
    else if (jQobj.hasClass('week')) {
        fieldtype = 'week';
    }
    else if (jQobj.hasClass('number')) {
        fieldtype = 'number';
    }
    else if (jQobj.hasClass('tel')) {
        fieldtype = 'tel';
    }
    else if (jQobj.hasClass('url')) {
        fieldtype = 'url';
    };
    switch (fieldtype) {
    case "textarea":
    case "password":
    case "text":
        return fvregional['dflt'].fvMustBeText;
        break;
    case "file":
        return fvregional['dflt'].fvMustBeFileName;
        break;
    case "select-one":
        return fvregional['dflt'].fvMustBeSelect;
        break;
    case "select-multiple":
        return fvregional['dflt'].fvMustBeSelMul;
        break;
    case "checkbox":
        return fvregional['dflt'].fvMustBeChboxChckd;
        break;
    case "radio":
        return fvregional['dflt'].fvMustBeRadioChckd;
        break;
        //HTML 5 compliants
    case "date":
        return fvregional['dflt'].fvMustBeDate;
        break;
    case "datetime":
    case "datetime-local":
        return fvregional['dflt'].fvMustBeDateTime;
        break;
    case "month":
        return fvregional['dflt'].fvMustBeMonth;
        break;
    case "time":
        return fvregional['dflt'].fvMustBeTime;
        break;
    case "week":
        return fvregional['dflt'].fvMustBeWeek;
        break;
    case "number":
        return fvregional['dflt'].fvMustBeNb;
        break;
    case "tel":
        return fvregional['dflt'].fvMustBeTel;
        break;
    case "url":
        return fvregional['dflt'].fvMustBeUrl;
        break;
    default:
        return fvregional['dflt'].fvMustBeDflt;
        break;
    };
}

function jQSelectorForMultipleFld(objmultname) {
    var realname = '';
    var jssep = '';
    $("[name='" + objmultname + "']").each(function (index) {
        searchlabel = "label[for='" + this.id + "']";
        realname = realname + jssep + $(searchlabel).text();
        jssep = ', ';
    });
    return realname;
}

function FormIsValid(fieldsnameArr) {
    var jQFieldsNotValidObj = FieldsFoundNotValid(fieldsnameArr);
    if (jQFieldsNotValidObj[0] === undefined) {
        return true;
    };
    var FieldsNotValidNames = '';
    var jQFieldsNotValidObjNb = jQFieldsNotValidObj.length;
    for (fai = 0; fai < jQFieldsNotValidObjNb; fai++) {
        fieldtype = jQFieldsNotValidObj[fai].attr('type');
        switch (fieldtype) {
        case "select-one":
            jQSelector = "label[for='" + jQFieldsNotValidObj[fai].attr('id') + "']";
            fieldlabel = $(jQSelector).text();
            break;
        case "select-multiple":
            jQSelector = "label[for='" + jQFieldsNotValidObj[fai].attr('id') + "']";
            fieldlabel = $(jQSelector).text();
            break;
        case "checkbox":
            fieldlabel = jQSelectorForMultipleFld(jQFieldsNotValidObj[fai].attr('name')) + ' : ';
            break;
        case "radio":
            fieldlabel = jQSelectorForMultipleFld(jQFieldsNotValidObj[fai].attr('name')) + ' : ';
            break;
        default:
            jQSelector = "label[for='" + jQFieldsNotValidObj[fai].attr('id') + "']";
            fieldlabel = $(jQSelector).text();
            break;
        };
        FieldsNotValidNames = FieldsNotValidNames + '\n' + fieldlabel + getValueRequiredType(jQFieldsNotValidObj[fai]);
        jQFieldsNotValidObj[fai].addClass('error');
    }
    alert(fvregional['dflt'].fvIntroText + FieldsNotValidNames);
    return false;
}