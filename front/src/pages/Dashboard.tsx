import React from "react";

const Dashboard = () => {
  const handleLogout = () => {
    localStorage.removeItem("token");
    window.location.href = "/login";
  };

  return (
    <div>
      <h2>ダッシュボード</h2>
      <button onClick={handleLogout}>ログアウト</button>
    </div>
  );
};

export default Dashboard;
