import Sequelize from "sequelize";
export const sequelize = new Sequelize({
    dialect: "sqlite",
    storage: 'src/sequelize.sqlite',
  });
export default sequelize;