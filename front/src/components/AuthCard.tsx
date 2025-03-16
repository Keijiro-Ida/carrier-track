import React from "react";

type AuthCardProps = {
    title: string;
    children: React.ReactNode;
};

const AuthCard: React.FC<AuthCardProps> = ({ title, children }) => {
    return (
        <div className="min-h-screen flex items-center justify-center bg-gray-100">
        <div className="bg-white p-8 rounded-lg shadow-lg w-96">
          <h2 className="text-center text-2xl font-bold mb-6">{title}</h2>
        {children}
        </div>
      </div>
    );
};

export default AuthCard;
