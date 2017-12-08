<form>
    <div>
        Operation:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
        </select>
    </div>
    <div>
        Number 1:
        <input type="text" name="firstNumber">
    </div>
    <div>
        Number 2:
        <input type="text" name="secondNumber">
    </div>
    <?php if (isset($result)): ?>
        <div>
            Result:
            <input type="text" disabled="disabled" readonly="readonly" value="<?= $result ?>"/>
        </div>
    <?php endif; ?>
    <div>
        <input type="submit" name="calculate" value="Calculate!">
    </div>
</form>