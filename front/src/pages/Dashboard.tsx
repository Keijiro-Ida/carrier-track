import React, { useEffect, useState } from "react";
import { useAuth } from "../context/AuthContext";
import { useNavigate } from "react-router-dom";

type Application = {
  id: number;
  company: {
    name: string;
  };
  position: string;
  aspiration_level: {
    level: string;
  };
  status: {
    name: string;
  };
  created_at: string;
}

const Dashboard: React.FC = () => {
  const { logout, getToken } = useAuth();
  const navigate = useNavigate();
  const [applications, setApplications] = useState<Application[]>([]);
  const token = getToken();

  useEffect(() => {
    const fetchApplications = async () => {

      const response = await fetch("http://localhost:9000/api/applications", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      if(response.ok){
        const data = await response.json();
        console.log("Fetched applications:", data); // ← ここでログを確認

        setApplications(data);
      } else {
        console.error("Failed to fetch applications");
        console.log(response);
      }
    };
    fetchApplications();
  }, [token, navigate]);

  const handleLogout = () => {
    logout();
    navigate("/login");
  };

  return (
    <div className="container mx-auto p-6">
      <h2 className="text-2xl font-bold mb-4">ダッシュボード</h2>
       {/* 応募一覧テーブル */}
       <table className="min-w-full bg-white border border-gray-300 shadow-md rounded-md">
        <thead>
          <tr className="bg-gray-200">
            <th className="py-2 px-4 border">企業名</th>
            <th className="py-2 px-4 border">ポジション</th>
            <th className="py-2 px-4 border">志望度</th>
            <th className="py-2 px-4 border">ステータス</th>
            <th className="py-2 px-4 border">応募日</th>
          </tr>
        </thead>
        <tbody>
          {Object.values(applications).map((app) => (
            <tr key={app.id} className="border-t">
              <td className="py-2 px-4 border">{app.company.name}</td>
              <td className="py-2 px-4 border">{app.position}</td>
              <td className="py-2 px-4 border">{app.aspiration_level.level}</td>
              <td className="py-2 px-4 border">{app.status.name}</td>
              <td className="py-2 px-4 border">{new Date(app.created_at).toLocaleDateString()}</td>
            </tr>
          ))}
        </tbody>
      </table>


      {/* ログアウトボタン */}
      <button
        onClick={handleLogout}
        className="mt-4 bg-red-500 text-white px-4 py-2 rounded-md"
      >
        ログアウト
      </button>
    </div>
  );
};
export default Dashboard;
