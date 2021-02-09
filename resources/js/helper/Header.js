export const getHeader = function (token = null) 
{
	const tokenData = JSON.parse(window.localStorage.getItem('vuex'))

	console.log(tokenData)

	const headers = {
		'Accept': 'application/json',
		'Authorization': 'Bearer ' + (tokenData == null) ? null : tokenData.token
	}
	
	return headers
}