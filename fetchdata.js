const generateDataBtn = document.querySelector('.generateDataBtn');
const textarea = document.querySelector('textarea');
const input = document.querySelector('input');
generateDataBtn.addEventListener('click', e => {
  e.preventDefault();
  axios
    .post('https://jsmethod.com/lorem', {
      sentencesQuantity: 20
    })
    .then(res => (textarea.textContent = res.data.lorem))
    .catch(err => console.log(err));
  axios
    .post('https://jsmethod.com/lorem', {
      card: true
    })
    .then(res => (input.value = res.data.loremTitle))
    .catch(err => console.log(err));
});
