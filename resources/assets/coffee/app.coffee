class StatusToggle
  constructor: ($select)->
    @$select = $select
    @token = $('meta[name="csrf-token"]').attr 'content'
    @$select.on 'change', @updateStatus.bind(@)

  updateStatus: ->
    $.ajax
      url: @$select.data('action')
      data: status: @$select.val(), _token: @token
      dataType: 'json'
      type: 'POST'
      error: @error.bind(@)

  error: (response)->
    alert response.statusText

$(document).ready ->
  $('.js_status_toggle').each ->
    new StatusToggle($(this))
