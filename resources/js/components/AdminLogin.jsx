import React from 'react';

const AdminLogin = () => {
  return (
    <div>
      <h2>Admin Login</h2>
      <form method="POST" action="/admin/login">
        <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"]').getAttribute('content')} />
        <div>
          <label htmlFor="email">Email:</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div>
          <label htmlFor="password">Password:</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div>
          <input type="checkbox" name="remember" id="remember" />
          <label htmlFor="remember">Remember Me</label>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  );
};

export default AdminLogin;
