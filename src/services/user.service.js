import { sequelize } from "../database/database.js";
import { User } from "../models/user.js";

export const createUser = async (data) => {
    const transaction = await sequelize.transaction();
    try {
        const user_data = {
            ci: data.ci,
            name: data.name,
            lastname: data.lastname,
            email: data.email,
            password: data.password
        };
        const data = await User.create(user_data, { transaction });
        await transaction.commit();
        return data; 
        } catch (error) {
            await transaction.rollback();
            throw error;
        }
    };

    const updateUser = async (id, data) => {
        const transaction = await sequelize.transaction();
        try {
            const user_data = {
                ci: data.ci,
                name: data.name,
                lastname: data.lastname,
                email: data.email,
                password: data.password
            };
            const data = await User.update(user_data, { where: { id_user: id } }, { transaction });
            await transaction.commit();
            return data;
        } catch (error) {
            await transaction.rollback();
            throw error;
        }
    };
    
    const deleteUser = async (id) => {
        const transaction = await sequelize.transaction();
        try {
            const data = await User.destroy({ where: { id_user: id } }, { transaction });
            await transaction.commit();
            return data;
        } catch (error) {
            await transaction.rollback();
            throw error;
        }
    };

    const getAllUsers = async () => {
        try {
            const data = await User.findAll();
            return data;
        } catch (error) {
            throw error;
        }
    };

    const getUserById = async (id) => {
        try {
            const data = await User.findByPk(id);
            return data;
        } catch (error) {
            throw error;
        }
    };