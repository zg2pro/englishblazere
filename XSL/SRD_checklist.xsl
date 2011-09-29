<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" indent="yes" />
	<xsl:template match="/">

 <script language="javascript" src='../JS/manage_checkboxes.js' type="text/javascript"></script> 

	
			<h2>
			<xsl:if test="$hl='en'">
			CASH - BUYING
			</xsl:if>
			<xsl:if test="$hl='fr'">
			COMPTANT - ACHAT
			</xsl:if>
			</h2>
		<table align="center" border="2" 
			summary="your browser cannot display tables" id="cash_buy">
		<tbody>
			<xsl:for-each select="//comptant/achat/item">
				<tr>
				<td><input type="checkbox" onClick="javascript:cashBuying('cash_buy')"/></td>
				<td>	       
		<xsl:value-of disable-output-escaping="yes" select="nature"/>
				</td></tr>
			</xsl:for-each>
		</tbody>
		</table>
		<div id="cash_buy_mark">
			0 %
		</div>
		
			<h2>
			<xsl:if test="$hl='en'">
			CASH - SALE
			</xsl:if>
			<xsl:if test="$hl='fr'">
			COMPTANT - VENTE
			</xsl:if>
			</h2>
		<table align="center" border="2" 
			summary="your browser cannot display tables" id="cash_sale">
		<tbody>
			<xsl:for-each select="//comptant/vente/item">
				<tr>
				<td><input type="checkbox" onClick="javascript:cashBuying('cash_sale')"/></td>
				<td>	       
		<xsl:value-of disable-output-escaping="yes" select="nature"/>
				</td></tr>
			</xsl:for-each>
		</tbody>
		</table>
		<div id="cash_sale_mark">
			0 %
		</div>
		
		
			<h2>
			<xsl:if test="$hl='en'">
			OVERDRAFT - SALE
			</xsl:if>
			<xsl:if test="$hl='fr'">
			DECOUVERT - VENTE
			</xsl:if>
			</h2>
		
		<table align="center" border="2" 
			summary="your browser cannot display tables" id="overdraft_sale">
		<tbody>
			<xsl:for-each select="//decouvert/vente/item">
				<tr>
				<td><input type="checkbox" onClick="javascript:cashBuying('overdraft_sale')"/></td>
				<td>	       
		<xsl:value-of disable-output-escaping="yes" select="nature"/>
				</td></tr>
			</xsl:for-each>
		</tbody>
		</table>
		<div id="overdraft_sale_mark">
			0 %
		</div>
		
		
		
			<h2>
			<xsl:if test="$hl='en'">
			OVERDRAFT - REPURCHASE
			</xsl:if>
			<xsl:if test="$hl='fr'">
			DECOUVERT - RACHAT
			</xsl:if>
			</h2>
		
		<table align="center" border="2" 
			summary="your browser cannot display tables" id="overdraft_repurchase">
		<tbody>
			<xsl:for-each select="//decouvert/rachat/item">
				<tr>
				<td><input type="checkbox" onClick="javascript:cashBuying('overdraft_repurchase')"/></td>
				<td>	       
		<xsl:value-of disable-output-escaping="yes" select="nature"/>
				</td></tr>
			</xsl:for-each>
		</tbody>
		</table>
		<div id="overdraft_repurchase_mark">
			0 %
		</div>
		
	</xsl:template>
	
	
	
</xsl:stylesheet>