import { sequelize } from "../database/database.js";
import { Product } from "../models/product.js";

export const createProduct = async (data) => {
    const transaction = await sequelize.transaction();
    try {
        const product_data = {
            name: data.name,
            description: data.description,
            quantity: data.quantity,
            total_price: data.total_price,
            price_unit: data.price_unit,
            id_inv: data.id_inv
        };
        const product = await Product.create(product_data, { transaction });
        await transaction.commit();
        return product;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const updateProduct = async (id, data) => {
    const transaction = await sequelize.transaction();
    try {
        const product_data = {
            name: data.name,
            description: data.description,
            quantity: data.quantity,
            total_price: data.total_price,
            price_unit: data.price_unit,
            id_inv: data.id_inv
        };
        const product = await Product.update(product_data, { where: { id_product: id } }, { transaction });
        await transaction.commit();
        return product;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const deleteProduct = async (id) => {
    const transaction = await sequelize.transaction();
    try {
        const data = await Product.destroy({ where: { id_product: id } }, { transaction });
        await transaction.commit();
        return data;
    } catch (error) {
        await transaction.rollback();
        throw error;
    }
};

export const getAllProducts = async () => {
    try {
        const data = await Product.findAll();
        return data;
    } catch (error) {
        throw error;
    }
};

export const getProductById = async (id) => {
    try {
        const data = await Product.findByPk(id);
        return data;
    } catch (error) {
        throw error;
    }
};

export const getProductByInventoryId = async (id) => {
    try {
        const data = await Product.findAll({ where: { id_inv: id } });
        return data;
    } catch (error) {
        throw error;
    }
};