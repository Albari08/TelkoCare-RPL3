import React from 'react';
import ReactDOM from 'react-dom';

function AdminDashboard() {
    return (
        <div className="dashboard-container">
            <h1>Admin Dashboard</h1>
            <p>Welcome, Admin!</p>
            {/* Komponen untuk manage user, dokter, dan rekam medis */}
            <div>
                <a href="/admins">Manage Admins</a>
            </div>
            <div>
                <a href="/doctors">Manage Doctors</a>
            </div>
            <div>
                <a href="/users">Manage Users</a>
            </div>
            <div>
                <a href="/medical-records">Manage Medical Records</a>
            </div>
        </div>
    );
}

export default AdminDashboard;

if (document.getElementById('admin-dashboard')) {
    ReactDOM.render(<AdminDashboard />, document.getElementById('admin-dashboard'));
}
