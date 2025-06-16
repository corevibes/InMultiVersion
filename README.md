# 🌐 Multiversion

**MultiVersionSupport** is an advanced, optimized plugin for **PocketMine-MP API 5** that allows you to **restrict or allow specific versions of the Minecraft Bedrock client**. Ideal for servers that want to maintain compatibility or limit access to unwanted versions.

---

## 🚀 Characteristics

- ✅ Support for multiple versions (e.g. `1.16.100`, `1.18.12`, `1.21.82`)
- 🔒 Automatically kicks players with disallowed builds
- 📊 Logging connection statistics by version
- ⚙️ Dynamic configuration in `config.json`
- 🔁 `/multiversion reload` or `/mv reload` command to reload the live configuration
- 🧼 Clean, modular, and professional code (use of `SingletonTrait`, `TextFormat`, and more)

---

## 📦 Requirements

- ✅ PocketMine-MP 5.0.0+
- ✅ PHP 8.1 or higher

---

## 🛠️ Facility

1. Download or clone this repository into your plugins/ folder
2. Make sure your plugin.yml is configured correctly
3. Start the server and check the `/resources/config.json` folder to edit the allowed values

---

## 📁 Configuration (`config.json`)

```json
{
  "allowed_versions": ["1.16.100", "1.18.12", "1.21.82"],
  "kick_message": "Your version is not supported on this server. Please use an approved version."
}