import React, { useState, useMemo, useRef } from 'react';
import { Calculator, TrendingUp, DollarSign, Clock, Target, Zap } from 'lucide-react';

interface InputValues {
  revenue: number;
  currentDSO: number;
  targetDSO: number;
  dpoExtension: number;
  cogsPercentage: number;
  salesPipeline: number;
  winRateImprovement: number;
  apFTECost: number;
  apFTEPercentage: number;
  apAutomationPercentage: number;
  closeRecFTECost: number;
  closeRecFTEPercentage: number;
  closeRecAutomationPercentage: number;
  earlyPaySpend: number;
  earlyPayDiscount: number;
}

interface InputField {
  key: keyof InputValues;
  label: string;
  prefix?: string;
  suffix?: string;
  section: string;
}

const inputFields: InputField[] = [
  { key: 'revenue', label: 'Revenue', prefix: '$', section: 'Cash & Working Capital Boost' },
  { key: 'currentDSO', label: 'Current DSO (days)', suffix: 'days', section: 'Cash & Working Capital Boost' },
  { key: 'targetDSO', label: 'Target DSO (days)', suffix: 'days', section: 'Cash & Working Capital Boost' },
  { key: 'dpoExtension', label: 'DPO Extension (days)', suffix: 'days', section: 'Cash & Working Capital Boost' },
  { key: 'cogsPercentage', label: '% of COGS in Revenue', suffix: '%', section: 'Cash & Working Capital Boost' },
  { key: 'salesPipeline', label: 'Sales Pipeline Influenced', prefix: '$', section: 'Revenue Lift' },
  { key: 'winRateImprovement', label: 'Quote Win-rate Improvement (%)', suffix: '%', section: 'Revenue Lift' },
  { key: 'apFTECost', label: 'AP: FTE Fully-Loaded Cost', prefix: '$', section: 'Automation Savings - AP' },
  { key: 'apFTEPercentage', label: 'AP: % of one FTE spent on AP', suffix: '%', section: 'Automation Savings - AP' },
  { key: 'closeRecFTECost', label: 'Close & Rec: FTE Cost', prefix: '$', section: 'Close & Reconciliation Savings' },
  { key: 'closeRecFTEPercentage', label: 'Close & Rec: % of one FTE spent', suffix: '%', section: 'Close & Reconciliation Savings' },
  { key: 'earlyPaySpend', label: 'Early-Pay Eligible Spend', prefix: '$', section: 'Early-Pay Discount Capture' },
  { key: 'earlyPayDiscount', label: 'Early-Pay Discount (%)', suffix: '%', section: 'Early-Pay Discount Capture' },
];

function App() {
  const [inputs, setInputs] = useState<InputValues>({
    revenue: 2500000,
    currentDSO: 45,
    targetDSO: 35,
    dpoExtension: 10,
    cogsPercentage: 70,
    salesPipeline: 4000000,
    winRateImprovement: 5,
    apFTECost: 80000,
    apFTEPercentage: 30,
    apAutomationPercentage: 75,
    closeRecFTECost: 80000,
    closeRecFTEPercentage: 30,
    closeRecAutomationPercentage: 30,
    earlyPaySpend: 80000,
    earlyPayDiscount: 4,
  });

  const inputRefs = useRef<{ [key: string]: HTMLInputElement | null }>({});

  const calculations = useMemo(() => {
    const workingCapitalFreed = inputs.revenue * (inputs.currentDSO - inputs.targetDSO) / 365;
    const payablesFloat = inputs.revenue * (inputs.cogsPercentage / 100) * (inputs.dpoExtension / 365);
    const liquiditySubtotal = workingCapitalFreed + payablesFloat;
    const addedRevenue = inputs.salesPipeline * (inputs.winRateImprovement / 100);
    const revenueSubtotal = addedRevenue;
    const apAutomationSavings = inputs.apFTECost * (inputs.apFTEPercentage / 100) * (inputs.apAutomationPercentage / 100);
    const closeRecSavings = inputs.closeRecFTECost * (inputs.closeRecFTEPercentage / 100) * (inputs.closeRecAutomationPercentage / 100);
    const earlyPaySavings = inputs.earlyPaySpend * (inputs.earlyPayDiscount / 100);
    const costSavingsSubtotal = apAutomationSavings + closeRecSavings + earlyPaySavings;
    const overallImpact = revenueSubtotal + costSavingsSubtotal + liquiditySubtotal;

    return {
      workingCapitalFreed,
      payablesFloat,
      liquiditySubtotal,
      addedRevenue,
      revenueSubtotal,
      apAutomationSavings,
      closeRecSavings,
      earlyPaySavings,
      costSavingsSubtotal,
      overallImpact
    };
  }, [inputs]);

  const updateInput = (key: keyof InputValues, value: number) => {
    setInputs(prev => ({ ...prev, [key]: value }));
  };

  const formatCurrency = (amount: number) => {
    return new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0,
    }).format(amount);
  };

  const formatNumber = (amount: number) => {
    return new Intl.NumberFormat('en-US').format(amount);
  };

  const OutputField = ({ label, value, highlight = false }: { label: string; value: number; highlight?: boolean }) => (
    <div className={`flex justify-between items-center py-2 ${highlight ? 'font-bold text-lg' : 'text-base'}`}>
      <span>{label}</span>
      <span>{formatCurrency(value)}</span>
    </div>
  );

  const groupedFields = inputFields.reduce((acc, field, index) => {
    if (!acc[field.section]) {
      acc[field.section] = [];
    }
    acc[field.section].push({ ...field, index });
    return acc;
  }, {} as { [key: string]: (InputField & { index: number })[] });

  return (
    <div className="min-h-screen bg-gray-50 py-8">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-8">
          <div className="flex justify-center items-center mb-4">
            <Calculator className="w-8 h-8 text-blue-600 mr-3" />
            <h1 className="text-3xl font-bold text-gray-900">ValueXPA AI Automation ROI Calculator</h1>
          </div>
          <p className="text-gray-600 max-w-2xl mx-auto text-lg">
            Calculate the financial impact of implementing AI-powered finance automation in your organization
          </p>
        </div>

        {/* Grand Totals Box on Top */}
        <div className="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-lg p-6 mb-8 text-gray-900 text-center shadow-md">
          <h2 className="text-2xl font-bold mb-2">📈 Overall Financial Impact</h2>
          <div className="text-5xl font-bold">{formatCurrency(calculations.overallImpact)}</div>
          <p className="mt-2 opacity-90 text-lg">Annual Revenue + Cost Savings + Liquidity Benefit</p>
        </div>

        <div className="grid lg:grid-cols-2 gap-8">
          <div className="space-y-6">
            <h2 className="text-2xl font-bold text-gray-900 mb-6">📝 Input Parameters</h2>
            <div className="text-base text-gray-600 mb-4 p-3 bg-blue-50 rounded-lg">
              <strong>Spreadsheet Navigation:</strong> Use Tab/Enter to move to next field, Arrow keys to navigate up/down, or paste multiple values at once
            </div>

            {Object.entries(groupedFields).map(([sectionName, fields]) => (
              <div key={sectionName} className="bg-white rounded-lg p-6 shadow-md">
                <div className="flex items-center mb-4">
                  <h3 className="text-xl font-semibold text-gray-900">{sectionName}</h3>
                </div>
                <div className="overflow-x-auto">
                  <table className="w-full">
                    <thead>
                      <tr className="border-b border-gray-200">
                        <th className="text-left py-2 px-2 text-base font-medium text-gray-700">Parameter</th>
                        <th className="text-right py-2 px-2 text-base font-medium text-gray-700">Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      {fields.map((field) => (
                        <tr key={field.key} className="border-b border-gray-100 hover:bg-gray-50">
                          <td className="py-2 px-2 text-base text-gray-700">{field.label}</td>
                          <td className="py-2 px-2">
                            <input
                              ref={(el) => (inputRefs.current[field.key] = el)}
                              type="text"
                              value={formatNumber(inputs[field.key])}
                              onChange={(e) => {
                                const rawValue = e.target.value.replace(/,/g, '');
                                const numValue = Number(rawValue);
                                if (!isNaN(numValue)) updateInput(field.key, numValue);
                              }}
                              onFocus={(e) => e.target.select()}
                              className="w-full px-2 py-1 text-base border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-right"
                            />
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </div>
            ))}
          </div>

          <div className="space-y-6">
            <h2 className="text-2xl font-bold text-gray-900 mb-6">📊 Calculated Results</h2>

            <div className="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-6 shadow-md text-white">
              <h3 className="text-lg font-semibold mb-4">Cash & Working Capital Boost</h3>
              <OutputField label="Working capital freed from DSO improvement" value={calculations.workingCapitalFreed} />
              <OutputField label="Payables float from DPO extension" value={calculations.payablesFloat} />
              <hr className="my-3 border-white/40" />
              <OutputField label="Liquidity Subtotal" value={calculations.liquiditySubtotal} highlight={true} />
            </div>

            <div className="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-6 shadow-md text-white">
              <h3 className="text-lg font-semibold mb-4">Revenue Lift</h3>
              <OutputField label="Added revenue from faster quotes" value={calculations.addedRevenue} />
              <hr className="my-3 border-white/40" />
              <OutputField label="Revenue Subtotal" value={calculations.revenueSubtotal} highlight={true} />
            </div>

            <div className="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-6 shadow-md text-white">
              <h3 className="text-lg font-semibold mb-4">Automation & Savings</h3>
              <OutputField label="AP automation savings" value={calculations.apAutomationSavings} />
              <OutputField label="Close & reconciliation savings" value={calculations.closeRecSavings} />
              <OutputField label="Early-pay discount savings" value={calculations.earlyPaySavings} />
              <hr className="my-3 border-white/40" />
              <OutputField label="Cost Savings Subtotal" value={calculations.costSavingsSubtotal} highlight={true} />
            </div>
          </div>
        </div>

        <div className="text-center mt-12 text-gray-500 text-base">
          <p>AI Finance Automation ROI Calculator - Calculate your potential savings and revenue impact</p>
        </div>
      </div>
    </div>
  );
}

export default App;