import React from 'react';
import ReactDOM from 'react-dom';

const Admin = () => {
	return <div>Hello admin</div>;
};

document.addEventListener('DOMContentLoaded', function (event) {
	ReactDOM.render(<Admin />, document.getElementById('admin'));
});
