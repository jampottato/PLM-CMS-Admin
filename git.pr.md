# Commit & PR Formatting

### **Commit and PR Types:**

1. **Feature:** New functionality added to the project.
2. **Fix:** Bug fixes or corrections to the code.
3. **Misc:** Miscellaneous changes that don't fit into other categories.
4. **Refactor:** Code changes that neither fix a bug nor add a feature, but improve code structure/efficiency.
5. **Style:** Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc).
6. **Docs:** Documentation only changes.
7. **Test:** Adding or modifying tests.
8. **Chore:** Regular code maintenance tasks (e.g., updating dependencies).
9. **Performance:** Improvements to the runtime performance of the code.
10. **Build:** Changes related to build and deployment system, involving scripts, configurations or tools.

### **Commit Formatting with Types:**

Using these types, your commit messages would follow this format:

```
[Type][Author] - Description
```

Examples:

```
[Feature][Kurt] - Implemented user authentication
[Fix][Kurt] - Resolved login bug
[Refactor][Kurt] - Improved code readability in user service
```

---

### **Pull Request Formatting with Types:**

Your PR titles and markdown file can incorporate these types similarly:

**PR Title Format:**

```
[Type][Author] - Title
```

Examples:

```
[Feature][Kurt] - Added user authentication
[Fix][Kurt] - Fixed login bug
```

````markdown
### Branch Name Formatting

```markdown
<type>/<feature name>

Example:
feature/feature-name
```
````

### Best Practice

- Make PR small as possible
- Don’t delete branches
- Dont —force push and merge sa `main`

> PR must be approved by co-dev
