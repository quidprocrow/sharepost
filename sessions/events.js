const getFormFields = require('../../../lib/get-form-fields.js')
const api = require('./api.js')
const ui = require('./ui.js')
const itemEvents = require('../items/events')
const fillers = require('../fillers/events.js')
// const store = require('../store')

const onSignInSubmit = function (event) {
  event.preventDefault()
  fillers.onClearState()
  const data = getFormFields(event.target)
  api.signInUser(data)
    .then(ui.onSignInSuccess)
    .then(itemEvents.onIndexItems)
    .catch(ui.onSignInFailure)
}

const onSignUpSubmit = function (event) {
  event.preventDefault()
  fillers.onClearState()
  const data = getFormFields(event.target)
  if (data.credentials.password !== data.credentials.password_confirmation) {
    return ui.passwordMissMatch()
  }
  api.signUpUser(data)
    .then(ui.onSignUpSuccess)
    .catch(ui.onSignUpFailure)
}

const onChangePassSubmit = function (event) {
  event.preventDefault()
  fillers.onClearState()
  const data = getFormFields(event.target)
  api.changePassUser(data)
    .then(ui.onChangePassSuccess)
    .catch(ui.onChangePassFailure)
}

const onSignOutClick = function () {
  fillers.onClearState()
  api.signOutUser()
    .then(ui.onSignOutSuccess)
    .catch(ui.onSignOutFailure)
}

const userEventListeners = function () {
  $('#content').on('submit', '#signInForm', onSignInSubmit)
  $('#content').on('submit', '#signUpForm', onSignUpSubmit)
  $('#content').on('submit', '#changePassForm', onChangePassSubmit)
  $('#content').on('click', '#signOut', onSignOutClick)
}

module.exports = {
  userEventListeners
}
