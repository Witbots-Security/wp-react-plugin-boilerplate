import React from 'react';
import ReactDOM from 'react-dom';

const Front = () => {
	alert('hello it is to the front guy');
	return <div>hello client</div>;
};

document.addEventListener('DOMContentLoaded', (event) => {
	ReactDOM.render(<Front />, document.getElementsById('front'));
});
