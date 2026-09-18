const mongoose = require('mongoose');
const dotenv = require('dotenv');
dotenv.config();

const connectDB = async () => {
  try {
    await mongoose.connect(process.env.MONGO_URI);
    console.log('✅ Base de datos conectada');
  } catch (error) {
    console.error('❌ Error al conectar con la base de datos:', error);
  }
};

module.exports = connectDB;
